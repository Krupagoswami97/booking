<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">

<style>
#map {
    height: 100%;
}


/* #description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
} */

#infowindow-content .title {
  font-weight: bold;
}

.controls {
  background-color: #fff;
  border-radius: 2px;
  border: 1px solid transparent;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  box-sizing: border-box;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  height: 29px;
 /*  margin-left: 17px; */
  margin-top: 10px;
  outline: none;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width:auto;
}

.controls:focus {
  border-color: #4d90fe;
}


#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  /* margin-left: 12px;*/
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width:auto;
}

.pac-container {
    z-index: 10000 !important;
}

#pac-input:focus {
  border-color: #4d90fe;
}


</style>

