import { FC } from "react";
import { Navigate } from "react-router-dom";
import { getToken, getRole } from "../../utils/auth";
import { ProtectedRoutesProps } from "../../types/authType";

const LoginProtectedRoute: FC<ProtectedRoutesProps> = ({ children }: any) => {
    if (getToken() && getRole() === "user") {
        return <Navigate to="/app" replace />;
    } else {
        return children;
    }
};

export default LoginProtectedRoute;
