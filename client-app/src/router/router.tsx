import { createBrowserRouter, Navigate } from "react-router-dom";

import AuthLayout from "../layouts/AuthLayout";
import AppLayout from "../layouts/AppLayout";
import AdminLayout from "../layouts/AdminLayout";

import ProtectedRoute from "../components/auth/ProtectedRoute";
import LoginProtectedRoute from "../components/auth/LoginProtectedRoute";
import ProtectedAdminRoute from "../components/auth/ProtectedAdminRoute";
import LoginProtectedAdminRoute from "../components/auth/LoginProtectedAdminRoute";

import ErrorPage from "../pages/errors/Error";
import NotFoundPage from "../pages/errors/NotFound";

import LoginPage from "../pages/auth/Login";
import RegisterPage from "../pages/auth/Register";
import RegisterSuccessPage from "../pages/auth/RegisterSuccess";

import HomePage from "../pages/app/home/Home";
import MyReservations from "../pages/app/my-reservations/MyReservations";

import ReservationsPage from "../pages/admin/Reservations";

const Router = createBrowserRouter([
    {
        path: "/",
        element: (
            <LoginProtectedRoute>
                <AuthLayout />
            </LoginProtectedRoute>
        ),
        errorElement: <ErrorPage />,
        children: [
            {
                path: "",
                element: <Navigate to="login" />,
            },
            {
                path: "login",
                element: <LoginPage />,
            },
            {
                path: "registrar",
                element: <RegisterPage />,
            },
            {
                path: "registrado",
                element: <RegisterSuccessPage />,
            },
        ],
    },
    {
        path: "app",
        element: (
            <ProtectedRoute>
                <AppLayout />
            </ProtectedRoute>
        ),
        errorElement: <ErrorPage />,
        children: [
            {
                path: "*",
                element: <NotFoundPage />,
            },
            {
                path: "",
                element: <HomePage />,
            },
            {
                path: "minhas-reservas",
                element: <MyReservations />,
            },
        ],
    },
    {
        path: "/admin",
        element: (
            <LoginProtectedAdminRoute>
                <AuthLayout />
            </LoginProtectedAdminRoute>
        ),
        errorElement: <ErrorPage />,
        children: [
            {
                path: "",
                element: <Navigate to="login" />,
            },
            {
                path: "login",
                element: <LoginPage />,
            },
        ],
    },
    {
        path: "admin/reservas",
        element: (
            <ProtectedAdminRoute>
                <AdminLayout />
            </ProtectedAdminRoute>
        ),
        errorElement: <ErrorPage />,
        children: [
            {
                path: "*",
                element: <NotFoundPage />,
            },
            {
                path: "",
                element: <ReservationsPage />,
            },
        ],
    },
    {
        path: "*",
        element: <NotFoundPage />,
    },
]);

export default Router;
