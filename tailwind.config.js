const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            width: {
                "96": "30rem",
                card: "26rem"
            },
            height: {
                "1/2": "10rem"
            },
            borderWidth: {
                "1": "1px"
            },
            colors: {
                orange: "#f35627",
                "dark-gray": "#616e7c",
                "light-gray": "#f1f5f8",
                "input-gray": "#7b8794",
                "heading-primary": "#1F2933",
                outline: "#616E7C",
                "bg-gray": "#F6F6F6"
            },
            fontFamily: {
                roboto: ["Roboto", ...defaultTheme.fontFamily.sans]
            },
            screens: {
                mobileMax: { max: "565px" },
                tabletMax: { max: "1024px" }
            }
        }
    },
    variants: {
        backgroundColor: ["responsive", "hover", "focus", "active"]
    },
    plugins: []
};
