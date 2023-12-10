const SnackbarEE = () => (
    <aside className="mdc-snackbar mdc-snackbar-error">
        <div
            className="mdc-snackbar__surface"
            role="status"
            aria-relevant="additions"
            style={{ backgroundColor: "#c34242", width: "400px"}}
        >
            <div className="mdc-snackbar__label" aria-atomic="false">
            </div>
            <div className="mdc-snackbar__actions" aria-atomic="true">
                <button
                    type="button"
                    className="mdc-button mdc-snackbar__action"
                    id="mdc-button"
                >
                    <div className="mdc-button__ripple"></div>

                </button>
            </div>
        </div>
    </aside>
);

export default SnackbarEE;
