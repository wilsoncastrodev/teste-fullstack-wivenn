import { FC } from "react";
import { Outlet } from "react-router-dom";

export const AuthLayout: FC = () => {
    return (
        <div className="auth-page">
            <div className="auth-page-content">
                <Outlet />
            </div>
        </div>
    );
};

export default AuthLayout;
