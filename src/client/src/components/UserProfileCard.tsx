"use client";

import { Avatar, AvatarFallback, AvatarImage } from "./ui/avatar";
import { LogOut } from "lucide-react";

export default function UserCard() {
  return (
    <div className="flex items-center justify-between px-6 mb-9">
      <div className="flex gap-3 items-center">
        <Avatar className="size-10">
          <AvatarImage src="https://github.com/shadcn.png" alt="@shadcn" />
          <AvatarFallback>CN</AvatarFallback>
        </Avatar>
        <div className="flex flex-col text-[14px]">
          <span className="font-bold">Victor</span>
          <span className="text-[#475367]">Victor@gmail.com</span>
        </div>
      </div>
      <LogOut size={20}/>
    </div>
  );
}
