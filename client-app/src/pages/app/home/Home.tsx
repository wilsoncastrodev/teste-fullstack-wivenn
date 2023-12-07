import { FC } from "react";
import SectionSearch from "./sections/SectionSearch";
import SectionListBooks from "./sections/SectionListBooks";

const HomePage: FC = () => (
    <div>
        <SectionSearch />
        <SectionListBooks />
    </div>
);

export default HomePage;