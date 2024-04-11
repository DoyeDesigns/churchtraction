'use client'

import React, { createContext, useState, useEffect } from 'react';
import { useWindowWidth } from "@react-hook/window-size";

interface SideNavContextProps {
  isSideNavOpen: boolean;
  toggleSideNav: () => void;
}

export const SideNavContext = createContext<SideNavContextProps>({
  isSideNavOpen: false,
  toggleSideNav: () => {},
});

interface SideNavProviderProps {
  children: React.ReactNode;
}

export const SideNavProvider: React.FC<SideNavProviderProps> = ({ children }) => {
  const currentWindowWidth = useWindowWidth();
  const [isSideNavOpen, setIsSideNavOpen] = useState<boolean>(currentWindowWidth >= 768);

  const toggleSideNav = () => {
    setIsSideNavOpen((prevState) => !prevState);
  };

  useEffect(() => {
    const handleResize = () => {
      setIsSideNavOpen(currentWindowWidth >= 768);
    };

    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, [currentWindowWidth]);

  return (
    <SideNavContext.Provider value={{ isSideNavOpen, toggleSideNav }}>
      {children}
    </SideNavContext.Provider>
  );
};