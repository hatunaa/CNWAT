const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const iconUpCode = $(".icon-up-code")
const iconUpId = $(".icon-up-id")
const iconDownName = $(".icon-down-name")
const iconDownCode = $(".icon-down-code")
const iconDownId = $(".icon-down-id")

const list = [
  {
    maSp: "SP001",
    tenSp: "Máy giặt",
  },
  {
    maSp: "SP002",
    tenSp: "Bếp đa năng",
  },
  {
    maSp: "SP003",
    tenSp: "Lò sưởi",
  },
  {
    maSp: "SP004",
    tenSp: "Điều hòa nhiệt độ",
  },
  {
    maSp: "SP005",
    tenSp: "Tủ lạnh",
  },
];

let i = 1;
let boolSortByName = false;
let boolSortById = false;
let boolSortByCode = false;
const render = list.map((item) => {
  return `
        <tr>
            <td>${i++}</td>
            <td>${item.maSp}</td>
            <td>${item.tenSp}</td>
        </tr>
    `;
});

render.unshift(`
    <tr>
        <th id="sort-by-index">
            <i class="fa-sharp fa-solid fa-caret-up icon-up-id"></i>
            STT
            <i class="fa-sharp fa-solid fa-caret-down icon-down-id"></i>
        </th>
        <th id="sort-by-code">
            <i class="fa-sharp fa-solid fa-caret-up icon-up-code"></i>
            Mã sản phẩm
            <i class="fa-sharp fa-solid fa-caret-down icon-down-code"></i>
        </th>
        <th class="sort-by-name">
            <i class="fa-sharp fa-solid fa-caret-up icon-up-name"></i>
            Tên sản phẩm
            <i class="fa-sharp fa-solid fa-caret-down icon-down-name"></i>
        </th>
    </tr>
`);

$("table").innerHTML = render.join("");

$$(".sort-by-name").forEach((element) => {
  element.addEventListener("click", () => {
    checkSelected()
    boolSortByName = !boolSortByName;
    if (boolSortByName) {
      $(".icon-up-name").classList.add("selected");
    } else {
      $(".icon-down-name").classList.add("selected");
    }
    return sortTable(boolSortByName, 2);
  });
});

$("#sort-by-code").addEventListener("click", () => {
  checkSelected()
  boolSortByCode = !boolSortByCode;
  if (boolSortByCode) {
    $(".icon-up-code").classList.add("selected");
  } else {
    $(".icon-down-code").classList.add("selected");
  }
  return sortTable(boolSortByCode, 1);
});

$("#sort-by-index").addEventListener("click", () => {
  checkSelected()
  boolSortById = !boolSortById;
  if (boolSortById) {
    $(".icon-up-id").classList.add("selected");
  } else {
    $(".icon-down-id").classList.add("selected");
  }
  return sortTable(boolSortById, 0);
});

const checkSelected = () => {
  $$('i').forEach(element => {
    if(element.classList.contains('selected'))
      element.classList.remove('selected')
  })
}

const sortTable = (boolSort, index) => {
  const table = $("table");
  let switching = true;
  let shouldSwitch = true;
  let rows;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < rows.length - 1; i++) {
      shouldSwitch = false;
      const x = rows[i].getElementsByTagName("TD")[index];
      const y = rows[i + 1].getElementsByTagName("TD")[index];
      if (boolSort) {
        if (
          x.innerHTML.toLowerCase().localeCompare(y.innerHTML.toLowerCase()) > 0
        ) {
          shouldSwitch = true;
          break;
        }
      } else {
        if (
          x.innerHTML.toLowerCase().localeCompare(y.innerHTML.toLowerCase()) < 0
        ) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i])
      switching = true;
    }
  }
}

const onSearch = () => {
  const filter = $('input').value.toUpperCase()
  tr = $('table').getElementsByTagName('tr')

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2]
    if (td) {
      txtValue = td.innerText
      index = txtValue.toUpperCase().indexOf(filter)
      if (index > -1) {
        tr[i].style.display = "";
        console.log(txtValue.substring(0, index));
        td.innerHTML = txtValue.substring(0, index) + "<span class='highlight'>" + txtValue.substring(index,index+filter.length) + "</span>" + txtValue.substring(index + filter.length);
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


