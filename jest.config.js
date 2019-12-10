module.exports = {
    testRegex: "resources/js/tests/.*.spec.js$",
    moduleFileExtensions: ["js", "json", "vue"],
    transform: {
        "^.+\\.js$": "<rootDir>/node_modules/babel-jest",
        ".*\\.(vue)$": "<rootDir>/node_modules/vue-jest"
    }
};
