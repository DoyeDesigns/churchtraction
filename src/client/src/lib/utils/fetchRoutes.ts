import { Route } from "../types/route";

export async function fetchRoutes(): Promise<Route[]> {
    const response = await fetch('http://your-laravel-app.com/api/routes');
    const routes: Route[] = await response.json();
    return routes;
  }