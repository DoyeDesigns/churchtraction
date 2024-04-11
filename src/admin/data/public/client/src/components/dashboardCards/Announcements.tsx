"use client";

import { Card, CardContent, CardFooter } from "@/components/ui/card";
import { Badge } from "../ui/badge";
import { Avatar, AvatarFallback, AvatarImage } from "../ui/avatar";
import Link from "next/link";

export default function Announcements() {
  return (
    <Card className="min-w-[320px] min-h-[155px] bg-customWhite border-none">
      <CardContent className="pt-7">
        <div className="flex items-center justify-between">
          <div className="flex items-center">
            <Avatar className="size-[54px] bg-[#FFECE5]">
              <AvatarFallback className="bg-dashboardAvater text-customWhite font-semibold text-[20px]">
                M
              </AvatarFallback>
            </Avatar>
            <Badge className="-translate-x-3/4 -translate-y-[145%] w-[13px] h-[13px] border-none rounded-full p-0 text-[10px] bg-[#FF0000]"></Badge>

            <span className="flex flex-col">
              <p className="font-bold text-base">Announcements</p>
            </span>
          </div>
        </div>
      </CardContent>
      <CardFooter className="py-2 border-t border-[#DDDDDD] mt-2">
        <Link href="#" className="p-0 w-full text-center text-sm">
          View announcements
        </Link>
      </CardFooter>
    </Card>
  );
}
