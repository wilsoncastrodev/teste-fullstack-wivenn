import { FC, useEffect, useState } from "react";

const Logo: FC = () => {
    const [loginType, setLoginType] = useState<any>(null);

    useEffect(() => {
        const _loginType = window.location.pathname.split('/')[1];
        setLoginType(_loginType);
    }, []);

    return <span className={"logo " + (loginType === "admin" && "logo-admin")}>Wivenn</span>;
}

export default Logo;
