export function saveSettings(settings, csrf) {
    fetch("/settings/update", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf,
        },
        body: JSON.stringify(settings),
    })
        .then((res) => res.json())
        .then((data) => console.log("Settings Saved:", data))
        .catch((err) => console.error("Settings Save Error:", err));
}
