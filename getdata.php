<?php
include 'conn.php';
function getdata($nilai1, $nilai2)
{
    $conn = connectDatabase();
    $sql = "SELECT * FROM obat WHERE idObat BETWEEN $nilai1 AND $nilai2";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $gambarDirectory = "images/";

            $gambarURL = $gambarDirectory . $row["gambarObat"];
            echo "<a href='detail.php?idObat=".$row["idObat"]."' id='".$row["idObat"]."' class='items d-block position-relative col-2 d-flex flex-column bg-light m-2 py-2' style='border: 3px solid rgb(255, 255, 255); border-radius: 10px;'>
                    <div class=''>
                        <div class='d-flex pb-4'>
                            <img src='" . $gambarURL . "' class='gambar mx-auto my-auto w-75' alt='" . $row["namaObat"] . "'>
                        </div>
                        <div class='label bg-light d-block w-100' style='border-radius: 0px 0px 7px 7px;'>
                            <span class='namaItems m-1'>" . $row["namaObat"] . "</span><br>
                            <span class='hargaItems m-1'>Rp. " . $row["hargaObat"] . "</span>
                        </div>
                    </div>
                </a>";
        }
    } else {
        echo "Tidak ada data obat.";
    }
}

//     echo "<a href='detail.php?idObat=".$row["idObat"]."' id='".$row["idObat"]."'
//     <div class='items d-block position-relative col-2 d-flex flex-column bg-light m-2 py-2' style='border: 3px solid rgb(255, 255, 255); border-radius: 10px;'>
//         <div class='d-flex pb-4'>
//             <img src='" . $gambarURL . "' class='gambar mx-auto my-auto w-75' alt='" . $row["namaObat"] . "'>
//         </div>
//         <div class='label bg-light d-block w-100' style='border-radius: 0px 0px 7px 7px;'>
//             <span class='namaItems m-1'>" . $row["namaObat"] . "</span><br>
//             <span class='hargaItems m-1'>Rp. " . $row["hargaObat"] . "</span>
//         </div>
//     </div>
// </a>";