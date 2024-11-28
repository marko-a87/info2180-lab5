window.addEventListener("DOMContentLoaded", () => {
  const b_lookup = document.getElementById("lookup_country");
  const b2_lookup = document.getElementById("lookup_cities");
  const countries = document.getElementById("result");
  const country = document.getElementById("country");
  console.log(b_lookup);
  console.log(countries);
  console.log(country);
  const Lookup_countries = () => {
    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
      if (req.readyState === 4 && req.status === 200) {
        let text = req.responseText;
        countries.innerHTML = "";
        countries.innerHTML = text;
      }
    };

    req.open(
      "GET",
      `http://localhost/info2180-lab5/world.php?country=${country.value.trim()}`
    );
    req.send();
  };

  const Lookup_cities = () => {
    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
      if (req.readyState === 4 && req.status === 200) {
        let text = req.responseText;
        countries.innerHTML = "";
        countries.innerHTML = text;
      }
    };
    req.open(
      "GET",
      `http://localhost/info2180-lab5/world.php?country=${country.value.trim()}&lookup=cities`
    );
    req.send();
  };

  b_lookup.addEventListener("click", () => {
    Lookup_countries();
  });

  b2_lookup.addEventListener("click", () => {
    Lookup_cities();
  });
});
