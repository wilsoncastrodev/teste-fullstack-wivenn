import { useEffect, useState } from "react";
import Sidebar from "react-sidebar";
import { RootState, useAppDispatch, useAppSelector } from "../../stores/store";
import { openNotification } from "../../stores/features/themeSlice";

const SidebarMain = ({ children }: any) => {
    const [open, setOpen] = useState(false);
    const dispatch = useAppDispatch();

    const openSidebar = useAppSelector((state: RootState) => state.theme.openSidebar);

    useEffect(() => {
        if (openSidebar) {
            setOpen(true);
            dispatch(openNotification(false))
        }
    }, [openSidebar]);

    useEffect(() => {
        if (open) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    }, [open]);

    return (
        <Sidebar
            rootClassName={"sidebar " + (!open ? "sidebar-remove" : "")}
            sidebarClassName="menu"
            contentClassName="content"
            overlayClassName="overlay"
            sidebar={<div>
                {children}
            </div>}
            open={open}
            onSetOpen={setOpen}
            pullRight={true}
        >
        </Sidebar>
    )
}

export default SidebarMain;