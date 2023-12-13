import { useEffect } from "react";
import { RootState, useAppDispatch, useAppSelector } from "../../stores/store";
import { getReservationsNotifiedLibrarian } from "../../stores/features/notificationSlice";
import SidebarMain from "../sidebars/SidebarMain";
import { formatDistanceToNow } from "../../utils/format";


const NotificationsReservation = () => {
    const notifications = useAppSelector((state: RootState) => state.notification.notifications);
    const dispatch = useAppDispatch();

    useEffect(() => {
            dispatch(getReservationsNotifiedLibrarian());
    }, []);

    useEffect(() => {
        const interval = setInterval(() => {
            dispatch(getReservationsNotifiedLibrarian());
        }, 5000);

        return () => clearInterval(interval);
    }, [notifications]);

    return (
        <div className="">
            <SidebarMain>
                <div className="sidebar-header">
                    <h4>Notificações</h4>
                </div>
                {
                    notifications && notifications.length > 0 ? notifications.map((notification: any, key: any) => (
                        <div className="notification" key={key}>
                            <div className="d-flex justify-content-between mb-1">
                                <strong>{notification.data.subject}</strong>
                                <span className="date">
                                    {formatDistanceToNow(notification.created_at)}
                                </span>
                            </div>
                            <div dangerouslySetInnerHTML={{ __html: notification.data.message }} />
                            <div className="text-end">

                            </div>
                        </div>
                    )) : null
                }
            </SidebarMain>
        </div>
    )
};

export default NotificationsReservation;
