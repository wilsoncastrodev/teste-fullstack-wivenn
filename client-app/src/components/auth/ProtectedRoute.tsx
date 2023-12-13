import { FC } from "react";
import { Navigate } from "react-router-dom";
import { getToken, getRole } from "../../utils/auth";
import { ProtectedRoutesProps } from "../../types/authType";

const ProtectedRoute: FC<ProtectedRoutesProps> = ({ children }: any) => {
    if (!getToken() || !(getRole() === "user")) {
        return <Navigate to="/login" replace />;
    } else {
        return children;
    }
};

export default ProtectedRoute;
