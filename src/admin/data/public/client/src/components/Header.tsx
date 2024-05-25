'use client'

import { usePathname } from "next/navigation"
import { Switch } from "@/components/ui/switch"
import { Separator } from "@/components/ui/separator"
import { Bell, UserRound, Menu } from 'lucide-react'
import { Badge } from "@/components/ui/badge"
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
import Image from "next/image"
import { Button } from "./ui/button"
import { useState } from 'react'
import React, { useContext } from 'react';
import { SideNavContext } from './SideNavContext';



export default function Header () {
    const [online, setOnline] = useState(true);
    const { toggleSideNav } = useContext(SideNavContext);

    const handleOnlineMode = () => {
        setOnline(!online)

        if (online) {
            console.log("online")
        } else {
            console.log("offline")
        }
    }

    const currentPath = usePathname();

    const navigationPath = [{path: '/', text: 'Dashboard'}, {path: '/members', text: 'Members'}]

    if (currentPath !== "/login") {
    return (
        <header className="flex items-center justify-between w-full px-[49px] border-b border-[#E4E7EC] pt-[19px] pb-[15px] bg-[#fff]">
            <span className='flex items-center gap-3'>
                <Button className="p-0 md:hidden" onClick={toggleSideNav}><Menu /></Button>
                {navigationPath.map(path => (
          path.path === currentPath ? (
            <span key={path.path}>{path.text} /</span>
          ) : null
        ))
      }
            </span>

            <div className="flex items-center">
                <span className="flex gap-3">
                    Offline <Switch
                        className='' 
                        checked={online}
                        onCheckedChange={handleOnlineMode}
                    /> <span className={`${online ? 'text-[#F56630]' : ''}`}>Online</span>
                </span>

                <Separator orientation="vertical" />

                <Button>
                    <Image src='/bell.svg' width={18} height={24} alt="notifications" />
                    <Badge className="-translate-x-1/2 -translate-y-[55%] flex justify-center h-[16px] border-none w-[15px] rounded-full text-[10px] font-semibold text-center text-[#fff] p-2 bg-[#F56630]">2</Badge>
                </Button>

                <Avatar className="size-[36px] bg-[#FFECE5]">
                    <AvatarImage src="" />
                    <AvatarFallback><UserRound fill="#F56630" stroke="none"/></AvatarFallback>
                </Avatar>
            </div>
        </header>
    )}
}