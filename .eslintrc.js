// eslint-disable-next-line no-undef
module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  extends: ["eslint:recommended", "plugin:vue/vue3-recommended"],
  parserOptions: {
    ecmaVersion: 12,
    sourceType: "module",
  },
  plugins: ["vue"],
  rules: {
    indent: ["error", 2],
    "linebreak-style": [2, "windows"],
    quotes: ["error", "double"],
    semi: ["error", "always"],

    // "vue/order-in-components": ["error"],
    // "vue/require-default-prop": ["off"],
    // "vue/max-attributes-per-line": [
    //   "error",
    //   {
    //     singleline: {
    //       max: 99,
    //       allowFirstLine: true,
    //     },
    //   },
    // ],
  },
  globals: { require: true, defineProps: true },
};
