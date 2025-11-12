const { defineConfig } = require('cypress');

module.exports = defineConfig({
  e2e: {
    // Base URL for your application
    baseUrl: 'http://localhost/MUNext',
    
    // Viewport settings
    viewportWidth: 1280,
    viewportHeight: 720,
    
    // Video and screenshot settings
    video: false,
    screenshotOnRunFailure: true,
    videosFolder: 'cypress/videos',
    screenshotsFolder: 'cypress/screenshots',
    
    // Test settings
    defaultCommandTimeout: 10000,
    pageLoadTimeout: 30000,
    requestTimeout: 10000,
    responseTimeout: 30000,
    
    // Retry settings
    retries: {
      runMode: 2,
      openMode: 0
    },
    
    // Spec pattern
    specPattern: 'cypress/e2e/**/*.cy.{js,jsx,ts,tsx}',
    
    setupNodeEvents(on, config) {
      // implement node event listeners here
      on('task', {
        log(message) {
          console.log(message);
          return null;
        }
      });
      
      return config;
    },
    
    // Environment variables
    env: {
      apiUrl: 'http://localhost/MUNext',
      testUser: 'demo',
      testPassword: 'demo123'
    }
  },
  
  // Component testing (if needed in future)
  component: {
    devServer: {
      framework: 'react',
      bundler: 'vite'
    }
  }
});
