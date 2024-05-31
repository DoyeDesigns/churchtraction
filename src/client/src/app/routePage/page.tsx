import { fetchRoutes } from "@/lib/utils/fetchRoutes";
import { Route } from "@/lib/types/route";

interface RoutesPageProps {
    routes: Route[];
  }
  
  const RoutesPage: React.FC<RoutesPageProps> = ({ routes }) => {
    return (
      <div>
        <h1>Routes</h1>
        <ul>
          {routes.map((route, index) => (
            <li key={index}>
              <p>URI: {route.uri}</p>
              <p>Methods: {route.methods.join(', ')}</p>
              <p>Action: {route.action}</p>
            </li>
          ))}
        </ul>
      </div>
    );
  };
  
  export const getServerSideProps = async () => {
    const routes = await fetchRoutes();
    return {
      props: { routes },
    };
  };
  
  export default RoutesPage;