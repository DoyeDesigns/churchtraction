"use client";

import { Card, CardContent } from "@/components/ui/card";
import { Badge } from "../ui/badge";
import { Button } from "../ui/button";
import { Avatar, AvatarFallback, AvatarImage } from "../ui/avatar";
import { EllipsisVertical } from "lucide-react";

interface Members {
  members: number;
}

export default function MemberCard({ members }: Members) {
  return (
    <Card className="min-w-[310px] min-h-[155px] bg-customWhite border-none">
      <CardContent className="pt-7">
        <div className="flex items-center justify-between">
          <div className="flex items-center">
            <Avatar className="size-[54px] bg-[#FFECE5]">
              <AvatarFallback className="bg-dashboardAvater text-customWhite font-semibold text-[20px]">
                M
              </AvatarFallback>
            </Avatar>
            <Badge className="-translate-x-3/4 -translate-y-[145%] w-[13px] h-[13px] border-none rounded-full p-0 text-[10px] bg-[#FF0000]"></Badge>

            <span className="flex flex-col relative">
              <p className="font-bold text-base">Your Members</p>
              <Badge className="absolute translate-y-4 flex justify-center border-none p-0  text-[30px] font-semibold text-center text-[#C53131]">
                {members}
              </Badge>
            </span>
          </div>

          <Button
            className="p-2 rounded-lg size-[32px] border-[#E4E7EC]"
            variant="outline"
          >
            <EllipsisVertical size={16} />
          </Button>
        </div>
      </CardContent>
    </Card>
  );
}
