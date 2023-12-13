import { FC } from "react";
import { Outlet } from "react-router-dom";
import HeaderAdmin from "../components/layouts/headers/HeaderAdmin";
import SnackbarError from "../components/snackbars/SnackbarError";
import NotificationsReservation from "../components/notifications/NotificationsReservation";

export const AdminLayout: FC = () => {
    return (
        <div style={{ background: '#f7f8f9', height: '100%' }}>
            <HeaderAdmin />
            <Outlet />
            <SnackbarError />
            <NotificationsReservation/>
        </div>
    );
};

export default AdminLayout;
