'use client'

import React, { useState } from "react";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { Search, SlidersHorizontal } from "lucide-react";
import { AddNewMember } from "./AddNewMember";

export default function SearchSection () {
    const [value, setValue] = useState("");

    const handleChange = (e: any) => {
      setValue(e.target.value);
  };
  const handleSearch = () => {
    console.log(value)
};



    return (
        <div className="flex justify-between items-center mt-[39px] mx-[49px]">
            <div className="relative w-[375px]">
            <Input
              name="password"
              value={value}
              onChange={handleChange}
              className="py-[10px] px-4 w-full border-[#D0D5DD] rounded-[6px]"
              placeholder="Search Members"
            />
            <button
              onClick={handleSearch}
              className="size-5 absolute right-[10px] top-[8px]"
            >
              <Search color="#757575"/>
            </button>
          </div>

          <div className="flex items-center gap-[11px]">
            <Button className="mr-[14px] text-[#8A8A8A]"><SlidersHorizontal className="mr-[10px]"/> Filter by</Button>
            <AddNewMember />
            <Button variant='outline' className="text-primary border-primary">Download List</Button>
          </div>
        </div>
    )
}