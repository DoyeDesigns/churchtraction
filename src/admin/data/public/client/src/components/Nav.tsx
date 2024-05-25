"use client";

import Link from "next/link";
import { LucideIcon, ChevronDown, ChevronUp } from "lucide-react";
import { Url } from "url";

import { cn } from "@/lib/utils";
import { buttonVariants } from "@/components/ui/button";
import { usePathname } from "next/navigation";
import { useRouter } from "next/navigation";
import { useEffect, useState } from "react";

interface NavProps {
  activeLink?: string;
  isCollapsed?: boolean;
  links: {
    title: string;
    label?: string;
    icon: LucideIcon;
    variant: "default" | "ghost";
    href?: string; // Optional for parent links
    submenu?: {
      title: string;
      href: string;
    }[]; // Array of submenu items
  }[];
}

export function Nav({ links, isCollapsed, activeLink }: NavProps) {
  const [openSubmenu, setOpenSubmenu] = useState<number | null>(null); // Keeps track of open submenu index

  const currentPathName = usePathname();

  const handleClick = (linkIndex: number | null) => {
    if (linkIndex !== null) {
      // const link = links[linkIndex];
      setOpenSubmenu(linkIndex === openSubmenu ? null : linkIndex); // Toggle open submenu
      // Store openSubmenu in local storage
      localStorage.setItem("openSubmenu", linkIndex === openSubmenu ? "" : linkIndex.toString());
    } else {
      // Handle single level link navigation (optional)
    }
  };

  useEffect(() => {
    // Retrieve openSubmenu from local storage on component mount
    const storedOpenSubmenu = localStorage.getItem("openSubmenu");
    if (storedOpenSubmenu !== null) {
      setOpenSubmenu(parseInt(storedOpenSubmenu));
    }
  }, []);

  return (
    <div
      className="group flex flex-col gap-4 py-3"
    >
      <nav className="grid gap-1 group-[[data-collapsed=true]]:justify-center group-[[data-collapsed=true]]:px-2 px-2">
        {links.map((link, index) => (
          <div key={index} className="group relative">
            {link.submenu ? (
              <span
                className={cn(
                  index === openSubmenu
                    ? "text-navLink" // Active style for open submenu parent
                    : "text-muted-foreground", // Default style for submenu parent
                  "flex justify-between items-center rounded-none text-lg cursor-pointer px-4 py-3" // Common styles for all links
                )}
                onClick={() => handleClick(index)}
              >
                <span className="inline-flex items-center">
                  {link.icon && <link.icon className="mr-2 h-4 w-4" />}
                  {link.title}
                </span>
                {link.submenu && index === openSubmenu ? <ChevronUp color="black" /> : <ChevronDown color="black" />}{" "}
              </span>
            ) : (
              <Link
                href={link.href || "#"}
                className={cn(
                  index === openSubmenu
                    ? "text-customRed" // Active style for open submenu parent
                    : "text-muted-foreground", // Default style for submenu parent
                  "flex items-center rounded-none text-lg cursor-pointer px-4 py-3", // Common styles for all links
                  currentPathName === link.href && "bg-navLink text-customWhite rounded"
                )}
              >
                {link.icon && <link.icon className="mr-2 h-4 w-4" />}
                {link.title}
              </Link>
            )}
            {link.submenu && (
              <ul
                className={`w-full py-2 mt-2 bg-white shadow-md rounded-md overflow-hidden transition-all duration-200 ${
                  index === openSubmenu ? "block" : "hidden"
                }`} // Show/hide submenu based on state
              >
                {link.submenu.map((subItem) => (
                  <li key={subItem.title}>
                    <div className="block px-4 py-2 hover:bg-gray-100">
                      <Link href={subItem.href} className="block">{subItem.title}</Link>
                    </div>
                  </li>
                ))}
              </ul>
            )}
          </div>
        ))}
      </nav>
    </div>
  );
}
