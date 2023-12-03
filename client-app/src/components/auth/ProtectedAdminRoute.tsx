import { FC } from "react";
import { Navigate } from "react-router-dom";
import { getToken, getRole } from "../../utils/auth";
import { ProtectedRoutesProps } from "../../types/authType";

const ProtectedAdminRoute: FC<ProtectedRoutesProps> = ({ children }: any) => {
    if (!getToken() || !(getRole() === "librarian")) {
        return <Navigate to="/admin/login" replace />;
    } else {
        return children;
    }
};

export default ProtectedAdminRoute;
