describe("Homepage", () => {
  it("should load successfully", () => {
    cy.visit("/");
    cy.contains("MUNext").should("be.visible");
  });

  it("should display login link", () => {
    cy.visit("/");
    cy.contains("Login").should("be.visible");
  });
});
