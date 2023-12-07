import { FC, Fragment } from "react";
import { Outlet } from "react-router-dom";
import Header from "../components/layouts/headers/Header";

export const AppLayout: FC = () => {
    return (
        <Fragment>
            <Header />
            <Outlet />
        </Fragment>
    );
};

export default AppLayout;
