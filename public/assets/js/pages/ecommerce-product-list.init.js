var minCostInput,maxCostInput,slider=document.getElementById("product-price-range");slider&&(noUiSlider.create(slider,{start:[1e3,3e3],step:10,margin:20,connect:!0,behaviour:"tap-drag",range:{min:0,max:5e3},format:wNumb({decimals:0,prefix:"$ "})}),minCostInput=document.getElementById("minCost"),maxCostInput=document.getElementById("maxCost"),slider.noUiSlider.on("update",function(e,t){t?maxCostInput.value=e[t]:minCostInput.value=e[t]}),minCostInput.addEventListener("change",function(){slider.noUiSlider.set([null,this.value])}),maxCostInput.addEventListener("change",function(){slider.noUiSlider.set([null,this.value])}));var isSelected=0,tabEl=document.querySelectorAll('a[data-bs-toggle="tab"]');tabEl.forEach(function(e){e.addEventListener("show.bs.tab",function(e){isSelected=0,document.getElementById("selection-element").style.display="none"})}),setTimeout(function(){document.querySelectorAll(".gridjs-checkbox").forEach(function(e){e.addEventListener("click",function(e){e.target.closest(".gridjs-tr").classList.contains("gridjs-tr-selected")?isSelected--:(document.getElementById("delete-product").addEventListener("click",function(){e.target.closest(".gridjs-tr").remove(),document.getElementById("btn-close").click(),document.getElementById("selection-element").style.display="none"}),isSelected++),document.getElementById("select-content").innerHTML=isSelected,document.getElementById("selection-element").style.display=0<isSelected?"block":"none"})})},100);var removeItem=document.getElementById("removeItemModal");removeItem&&removeItem.addEventListener("show.bs.modal",function(e){isSelected=0,document.getElementById("delete-product").addEventListener("click",function(){e.relatedTarget.closest(".gridjs-tr")&&(e.relatedTarget.closest(".gridjs-tr").remove(),document.getElementById("select-content").innerHTML=isSelected),document.getElementById("btn-close").click(),document.getElementById("text")&&(document.getElementById("text").style.display="none")})});var TableProductListAll=document.getElementById("table-product-list-all");TableProductListAll&&new gridjs.Grid({columns:[{id:"productListAllCheckbox",name:"#",width:"40px",sort:{enabled:!1},plugin:{component:gridjs.plugins.selection.RowSelection,props:{id:function(e){return e.cell(6).data}}}},{name:"Product",width:"360px",formatter:function(e){return gridjs.html('<div class="d-flex align-items-center"><div class="flex-shrink-0 me-3"><div class="avatar-sm bg-light rounded p-1"><img src="assets/images/products/'+e[0]+'" alt="" class="img-fluid d-block"></div></div><div class="flex-grow-1"><h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-dark">'+e[1]+'</a></h5><p class="text-muted mb-0">Category : <span class="fw-medium">'+e[2]+"</span></p></div></div>")}},{name:"Stock",width:"94px"},{name:"Price",width:"101px"},{name:"Orders",width:"84px"},{name:"Rating",width:"105px",formatter:function(e){return gridjs.html('<span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>'+e+"</span></td>")}},{name:"Published",width:"220px",formatter:function(e){return gridjs.html(e[0]+'<small class="text-muted ms-1">'+e[1]+"</small>")}},{name:"Action",width:"80px",sort:{enabled:!1},formatter:function(e){return gridjs.html('<div class="dropdown"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="apps-ecommerce-product-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li><li><a class="dropdown-item" href="apps-ecommerce-add-product.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li><li class="dropdown-divider"></li><li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li></ul></div>')}}],className:{th:"text-muted"},pagination:{limit:10},sort:!0,data:[[["img-1.png","Half Sleeve Round Neck T-Shirts","Clothes"],"12","$ 115.00","48","4.2",["12 Oct, 2021","10:05 AM"]],[["img-2.png","Urban Ladder Pashe Chair","Furniture"],"06","$ 160.00","30","4.3",["06 Jan, 2021","01:31 PM"]],[["img-3.png","350 ml Glass Grocery Container","Kitchen Storage & Containers"],"10","$ 25.00","48","4.5",["26 Mar, 2021","11:40 AM"]],[["img-4.png","Fabric Dual Tone Living Room Chair","Furniture"],"15","$ 140.00","40","4.2",["19 Apr, 2021","02:51 PM"]],[["img-5.png","Crux Motorsports Helmet","Bike Accessories"],"08","$ 135.00","55","4.4",["30 Mar, 2021","09:42 AM"]],[["img-6.png","Half Sleeve T-Shirts (Blue)","Clothes"],"15","$ 125.00","48","4.2",["12 Oct, 2021","04:55 PM"]],[["img-7.png","Noise Evolve Smartwatch","Watches"],"12","$ 95.00","45","4.3",["15 May, 2021","03:40 PM"]],[["img-8.png","Sweatshirt for Men (Pink)","Clothes"],"20","$ 120.00","48","4.2",["21 Jun, 2021","12:18 PM"]],[["img-9.png","Reusable Ecological Coffee Cup","Tableware & Dinnerware"],"14","$ 125.00","55","4.3",["15 Jan, 2021","10:29 AM"]],[["img-10.png","Travel Carrying Pouch Bag","Bags, Wallets and Luggage"],"20","$ 115.00","60","4.3",["15 Jun, 2021","03:51 Pm"]],[["img-1.png","Half Sleeve Round Neck T-Shirts","Clothes"],"12","$ 115.00","48","4.2",["12 Oct, 2021","10:05 AM"]],[["img-2.png","Urban Ladder Pashe Chair","Furniture"],"06","$ 160.00","30","4.3",["06 Jan, 2021","01:31 PM"]]]}).render(document.getElementById("table-product-list-all"));var TableProductListPublished=document.getElementById("table-product-list-published");TableProductListPublished&&new gridjs.Grid({columns:[{id:"productListPublishedCheckbox",name:"#",width:"40px",sort:{enabled:!1},plugin:{component:gridjs.plugins.selection.RowSelection,props:{id:function(e){return e.cell(6).data}}}},{name:"Product",width:"360px",formatter:function(e){return gridjs.html('<div class="d-flex align-items-center"><div class="flex-shrink-0 me-3"><div class="avatar-sm bg-light rounded p-1"><img src="assets/images/products/'+e[0]+'" alt="" class="img-fluid d-block"></div></div><div class="flex-grow-1"><h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-dark">'+e[1]+'</a></h5><p class="text-muted mb-0">Category : <span class="fw-medium">'+e[2]+"</span></p></div></div>")}},{name:"Stock",width:"94px"},{name:"Price",width:"101px"},{name:"Orders",width:"84px"},{name:"Rating",width:"105px",formatter:function(e){return gridjs.html('<span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>'+e+"</span></td>")}},{name:"Published",width:"220px",formatter:function(e){return gridjs.html(e[0]+'<small class="text-muted ms-1">'+e[1]+"</small>")}},{name:"Action",width:"80px",sort:{enabled:!1},formatter:function(e){return gridjs.html('<div class="dropdown"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="apps-ecommerce-product-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li><li><a class="dropdown-item" href="apps-ecommerce-add-product.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li><li class="dropdown-divider"></li><li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li></ul></div>')}}],className:{th:"text-muted"},pagination:{limit:10},sort:!0,data:[[["img-2.png","Urban Ladder Pashe Chair","Furniture"],"06","$ 160.00","30","4.3",["06 Jan, 2021","01:31 PM"]],[["img-6.png","Half Sleeve T-Shirts (Blue)","Clothes"],"15","$ 125.00","48","4.2",["12 Oct, 2021","04:55 PM"]],[["img-4.png","Fabric Dual Tone Living Room Chair","Furniture"],"15","$ 140.00","40","4.2",["19 Apr, 2021","02:51 PM"]],[["img-3.png","350 ml Glass Grocery Container","Kitchen Storage & Containers"],"10","$ 25.00","48","4.5",["26 Mar, 2021","11:40 AM"]],[["img-5.png","Crux Motorsports Helmet","Bike Accessories"],"08","$ 135.00","55","4.4",["30 Mar, 2021","09:42 AM"]]]}).render(document.getElementById("table-product-list-published"));