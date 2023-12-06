import { FC } from "react";
import { Outlet } from "react-router-dom";

export const AdminLayout: FC = () => {
    return (
        <div>
            <Outlet />
        </div>
    );
};

export default AdminLayout;
