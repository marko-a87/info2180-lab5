window.addEventListener("DOMContentLoaded", () => {
  const b_lookup = document.getElementById("lookup");
  const countries = document.getElementById("result");
  const country = document.getElementById("country");
  console.log(b_lookup);
  console.log(countries);
  console.log(country);
  const Lookup = async () => {
    let url = await fetch(
      `http://localhost/info2180-lab5/world.php?country=${country.value}`
    );
    console.log(url);
    let text = await url.text();
    countries.innerHTML = "";
    countries.innerHTML = text;
  };

  b_lookup.addEventListener("click", () => {
    Lookup();
  });
});
