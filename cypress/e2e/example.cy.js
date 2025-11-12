describe("MUNext - Basic Tests", () => {
  beforeEach(() => {
    // Visit homepage before each test
    cy.visit("/");
  });

  it("should load the homepage", () => {
    cy.contains("MUNext").should("be.visible");
    cy.title().should("include", "MUNext");
  });

  it("should have a navigation menu", () => {
    cy.get("nav").should("be.visible");
    cy.contains("Home").should("be.visible");
    cy.contains("Jobs").should("be.visible");
  });

  it("should display the login link", () => {
    cy.contains("Login").should("be.visible");
  });

  it("should navigate to jobs page", () => {
    cy.contains("Jobs").click();
    cy.url().should("include", "browse-jobs.php");
  });

  it("should have a search functionality", () => {
    cy.get('input[name="keyword"]').should("exist");
    cy.get('button[type="submit"]').should("exist");
  });
});
