const js = require('@eslint/js');
module.exports = [js.configs.recommended, { files: ['assets/src/js/**/*.js'], languageOptions: { ecmaVersion: 2022, sourceType: 'script', globals: { document: 'readonly', window: 'readonly', sessionStorage: 'readonly' } } }];

