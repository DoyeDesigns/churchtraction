import FilterSection from "@/components/FilterSection";
import ReportNotification from "@/components/ReportNotification";
import CardSection from "@/components/dashboardCards/CardSection";
import Image from "next/image";

export default function Home() {
  return (
    <main>
      <FilterSection header='Victor'/>
      <ReportNotification />
      <CardSection />
    </main>
  );
}
