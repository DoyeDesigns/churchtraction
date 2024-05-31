"use client";

import React from "react";
import { Button } from "./ui/button";
import Image from "next/image";
import { usePathname } from "next/navigation";

interface SearchBarProps {
  header: string;
}

function FilterSection(prop: SearchBarProps) {
  const currentPath = usePathname();

  return (
    <section className="flex justify-between items-center mt-5 mb-8 px-[49px]">
      {currentPath === "/" ? (
        <span className="inline-flex items-center gap-2 text-[18px]">
          Hello <span className="text-cta font-semibold">{prop.header}</span>{" "}
          <Image src="/wave-hand.jpg" width={26} height={26} alt="wave" />
        </span>
      ) : (
        <h1 className="text-3xl font-bold">{prop.header}</h1>
      )}

      <Button
        className="border-cta text-cta flex gap-2 items-center px-3 py-2 text-sm rounded-lg"
        variant="outline"
      >
        <Image src="/filter-icon.svg" width={16} height={16} alt="filter" />{" "}
        Filter
      </Button>
    </section>
  );
}

export default FilterSection;
