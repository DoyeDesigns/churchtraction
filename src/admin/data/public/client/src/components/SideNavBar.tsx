"use client";

import React, { useState } from "react";
import { Nav } from './Nav';
import { usePathname } from "next/navigation";
import Image from "next/image";
import { useContext } from 'react';
import { SideNavContext } from './SideNavContext';

type Props = {};

import { useWindowWidth } from "@react-hook/window-size";

import {
  LayoutDashboard,
  MessagesSquare,
  School,
  NotepadText,
  Newspaper,
  UsersRound,
  X,
  Settings
} from "lucide-react";
import { Button } from "./ui/button";
import UserCard from "./UserProfileCard";

export default function SideNavBar({}: Props) {
  // const [isCollapsed, setIsCollapsed] = useState(false);
  const { isSideNavOpen } = useContext(SideNavContext);
  const { toggleSideNav } = useContext(SideNavContext);

  const currentPathName = usePathname();
  const currentWindowWidth = useWindowWidth();
  const mobileWidth = currentWindowWidth < 768;

  if (currentPathName !== "/login") {
    return (
      <div
        className={`h-screen overflow-auto border-r z-10 flex flex-col gap-10 justify-between bg-customWhite  ${
          isSideNavOpen ? 'w-[272px] md:w-[372px]' : 'hidden'
        } ${mobileWidth && isSideNavOpen ? 'absolute top-0 left-0 z-50' : ''}`}//272px
      >
        <div>
        {mobileWidth && (
          <div className="flex justify-end">
            <Button
              variant="secondary"
              className="rounded-full p-2"
              onClick={toggleSideNav}
            >
              <X />
            </Button>
          </div>
        )}
        <Image
          src="/logo.png"
          height={54}
          width={153}
          alt="logo"
          className="mx-auto mb-9"
        />
        <span className="ml-6 text-[14px] text-[#98A2B3]">Main menu</span>
        <Nav
          // isCollapsed={mobileWidth ? true : isCollapsed}
          links={[
            {
              title: "Dashboard",
              label: "",
              href: "/",
              icon: LayoutDashboard,
              variant: "default",
            },
            {
              title: "Reports",
              label: "",
              href: "/reports",
              icon: NotepadText,
              variant: "ghost",
              submenu: [{
                title: 'menu1',
                href: '/menu1',
              }]
            },
            {
              title: "Members",
              label: "",
              href: "/members",
              icon: UsersRound,
              variant: "ghost",
              submenu: [{
                title: 'menu1',
                href: '/menu1',
              },]
            },
            {
              title: "Announcement",
              label: "",
              href: "/announcement",
              icon: Newspaper,
              variant: "ghost",
            },
            {
              title: "Messages",
              label: "",
              href: "/results-tab",
              icon: MessagesSquare,
              variant: "ghost",
            },
          ]}
        />

        <div className="bg-[#F0F2F5] h-[1px] mx-2"></div>

        <Nav 
        // isCollapsed={mobileWidth ? true : isCollapsed}
        links={[
          {
            title: "Foundation school",
            label: "",
            href: "/foundation-school",
            icon: School,
            variant: "ghost",
            submenu: [{
              title: 'menu1',
              href: '/menu1',
            }]
          },
        ]}
        />

      <span className="ml-6 text-[14px] text-[#98A2B3]">More</span>

      <Nav 
        // isCollapsed={mobileWidth ? true : isCollapsed}
        links={[
          {
            title: "Settings",
            label: "",
            href: "/foundation-school",
            icon: Settings,
            variant: "ghost",
          },
        ]}
        />
        </div>

        <div>
          <UserCard />
        </div>
      </div>
    );
  }

  return null;
}
