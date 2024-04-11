"use client";

import Image from "next/image";
import { Button } from "./ui/button";

export default function ReportNotification() {
  return (
    <div className="flex items-center justify-between mx-[49px] bg-[#0196E8]/[7%] py-[30px] px-[32px] rounded-[10px] mb-4">
      <div className="flex items-center space-x-[25px]">
        <span className="size-[35px] rounded-full flex justify-center items-center bg-[#FFD9D9]">
          <Image src="/info-icon.svg" width={18} height={18} alt="info-alert" />
        </span>

        <p className="text-sm">
          Please{" "}
          <span className="font-semibold">
            you have a pending report to submit
          </span>{" "}
          kindly click submit report and fill out the report.
        </p>
      </div>

      <Button className="bg-notificationCta rounded-[10px] w-[141px] h-[36.7px] text-customWhite">Send Report</Button>
    </div>
  );
}
