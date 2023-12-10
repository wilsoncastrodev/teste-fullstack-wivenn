import { FC, Fragment } from "react";
import { Outlet } from "react-router-dom";
import Header from "../components/layouts/headers/Header";
import Snackbar from "../components/snackbars/Snackbar";
import SnackbarError from "../components/snackbars/SnackbarError";

export const AppLayout: FC = () => {
    return (
        <Fragment>
            <Header />
            <Outlet />
            <Snackbar />
            <SnackbarError />
        </Fragment>
    );
};

export default AppLayout;
