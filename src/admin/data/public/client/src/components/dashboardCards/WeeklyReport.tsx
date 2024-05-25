"use client";

import { Card, CardContent } from "@/components/ui/card";
import { Badge } from "../ui/badge";
import { Button } from "../ui/button";
import { Avatar, AvatarFallback, AvatarImage } from "../ui/avatar";
import { EllipsisVertical } from "lucide-react";

export type Status = "Pending" | "Up-to-date" | "In-review";

interface WeeklyReports {
  reports: {
    title: string;
    status: string;
  }[];
}

export default function CellReportCard({ reports }: WeeklyReports) {
  return reports.map((report, index) => (
    <Card key={index} className="min-w-[310px] min-h-[155px] bg-customWhite border-none">
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
              <p className="font-bold text-base">{report.title}</p>
              <Badge
                className={`absolute translate-y-7 flex justify-center items-center border-none p-0  text-sm text-center ${
                  report.status === "Pending"
                    ? "text-[#C53131] bg-[#FFECE5]"
                    : report.status === "Up-to-date"
                    ? "text-[#468D1B] bg-[#D6FFDA]"
                    : report.status === "In-review"
                    ? "text-[#A07401] bg-[#FFFCB9]"
                    : ""
                } rounded-xl px-3 py-[2px]`}
              >
                {report.status}
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
  ));
}
