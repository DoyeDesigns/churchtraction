'use client'

import FilterSection from "@/components/FilterSection";
import ReportNotification from "@/components/ReportNotification";
import CardSection from "@/components/dashboardCards/CardSection";
import Image from "next/image";
import { useState, useEffect } from 'react';

export default function Home() {
  const fetchHomeData = async () => {
    try {
      const baseUrl = 'https://obscure-parakeet-qjjpp6x67p63x46j-8300.app.github.dev'; // Replace with your Laravel application URL
      const url = `${baseUrl}/privacy-policy`;
      const response = await fetch(url);
      const data = await response.json();
      console.log(data);
      console.log('hello');
      return data;
    } catch (error) {
      console.error('Error fetching announcements:', error);
      throw error;
    }
  };

  const [homeData, setHomeData] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      const data = await fetchHomeData();
      setHomeData(data);
    };

    fetchData();
  }, []);

  console.log(homeData)

  return (
    <main>
      <FilterSection header='Victor'/>
      <ReportNotification />
      <CardSection />
    </main>
  );
}
