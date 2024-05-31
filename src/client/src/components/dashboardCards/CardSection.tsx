import Announcements from "./Announcements";
import CellReportCard from "./CellReport";
import MemberCard from "./Members";
import WeeklyReport from "./WeeklyReport";
import UpcomingEvents from "./Events";

const reportCardReports = [
  {
    title: "Cell Report",
    status: "Pending",
    tasks: "1 of 54",
    cta: "Send Report",
  },
  {
    title: "Outreach Report",
    status: "Up-to-date",
    tasks: "1 of 12",
    cta: "Send Report",
  },
];

const weeklyReport = [
  {
    title: "Weekly Reports",
    status: "In-review",
  },
];

export default function CardSection() {
  return (
    <section className="grid grid-cols-1 min-[977px]:grid-cols-2 min-[1300px]:grid-cols-3 gap-5 px-[49px] justify-center">
      <MemberCard members={20} />
      <CellReportCard reports={reportCardReports} />
      <WeeklyReport reports={weeklyReport} />
      <Announcements />
      <UpcomingEvents />
    </section>
  );
}
