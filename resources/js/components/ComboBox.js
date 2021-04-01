import Axios from "axios";
import React, { useEffect, useMemo, useState } from "react";
import ReactDOM from "react-dom";
import Select from "react-select";

function ComboBox({ locationUrl }) {
  const [location, setLocation] = useState([]);
  const [selectedKecamatan, setKecamatan] = useState({});
  const [selectedDesa, setDesa] = useState({});

  const kecamatan = useMemo(
    () => location.map(val => ({ label: val.kecamatan, value: val.kecamatan })),
    [location]
  );

  const desa = useMemo(
    () =>
      location
        .find(val => val.kecamatan == selectedKecamatan.value)
        ?.desa.map(val => ({ label: val.desa, value: val.desa })),
    [selectedKecamatan]
  );

  const fetchData = async () => {
    try {
      let response = await Axios.get(locationUrl);
      setLocation(response.data.data);
    } catch (e) {
      console.error(e);
    }
  };

  useEffect(() => {
    fetchData();
  }, [selectedKecamatan]);

  return (
    <>
      <Select
        options={kecamatan}
        onChange={val => setKecamatan(val)}
        value={selectedKecamatan}
      />
      <Select
      className="my-3"
        options={desa}
        onChange={val => setDesa(val)}
        value={selectedDesa}
      />
      <input style={{display: 'none'}} name="kecamatan" value={selectedKecamatan.value} />
      <input style={{display: 'none'}} name="desa" value={selectedDesa.value} />
    </>
  );
}

export default ComboBox;

if (document.getElementById("combo-box")) {
  let locationUrl = document
    .getElementById("combo-box")
    .getAttribute("data-location");

  ReactDOM.render(
    <ComboBox locationUrl={locationUrl} />,
    document.getElementById("combo-box")
  );
}
