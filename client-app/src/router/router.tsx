import { createBrowserRouter, Navigate } from 'react-router-dom';

import Layout from '../layouts/Layout';
import ErrorPage from '../pages/errors/Error';

import HomePage from '../pages/Home';

const Router = createBrowserRouter([
    {
        path: '/',
        element: <Layout />,
        errorElement: <ErrorPage />,
        children: [
            {
                path: "",
                element: <HomePage />,
            },
        ]
    },
    {
        path: '*',
        element: <Navigate to="/" />
    }
])

export default Router
