$(document).ready(function(){$("#basicScenario").jsGrid({width:"100%",filtering:!0,editing:!0,inserting:!0,sorting:!0,paging:!0,autoload:!0,pageSize:15,pageButtonCount:5,deleteConfirm:"Do you really want to delete the client?",controller:db,fields:[{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name"},{name:"Married",type:"checkbox",title:"Is Married",sorting:!1},{type:"control"}]}),$("#serviceScenario").jsGrid({height:"auto",width:"100%",sorting:!0,paging:!1,autoload:!0,controller:{loadData:function(){var a=$.Deferred();return $.ajax({url:"http://services.odata.org/V3/(S(3mnweai3qldmghnzfshavfok))/OData/OData.svc/Products",dataType:"json"}).done(function(b){a.resolve(b.value)}),a.promise()}},fields:[{name:"Name",type:"text"},{name:"Description",type:"textarea",width:150},{name:"Rating",type:"number",width:50,align:"center",itemTemplate:function(a){return $("<div>").addClass("rating").append(Array(a+1).join("&#9733;"))}},{name:"Price",type:"number",width:50,itemTemplate:function(a){return a.toFixed(2)+"$"}}]}),$("#sorting-table").jsGrid({height:"400px",width:"100%",autoload:!0,selecting:!1,controller:db,fields:[{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name"},{name:"Married",type:"checkbox",title:"Is Married"}]}),$("#sort").on("click",function(){var a=$("#sortingField").val();$("#sorting-table").jsGrid("sort",a)}),$("#validation").jsGrid({width:"100%",filtering:!0,editing:!0,inserting:!0,sorting:!0,paging:!0,autoload:!0,pageSize:15,pageButtonCount:5,deleteConfirm:"Do you really want to delete the client?",controller:db,fields:[{name:"Name",type:"text",width:150,validate:"required"},{name:"Age",type:"number",width:50,validate:{validator:"range",param:[18,80]}},{name:"Address",type:"text",width:200,validate:{validator:"rangeLength",param:[10,250]}},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name",validate:{message:"Country should be specified",validator:function(a){return a>0}}},{name:"Married",type:"checkbox",title:"Is Married",sorting:!1},{type:"control"}]}),$("#loading").jsGrid({width:"100%",autoload:!0,paging:!0,pageLoading:!0,pageSize:15,pageIndex:2,controller:{loadData:function(a){var b=(a.pageIndex-1)*a.pageSize;return{data:db.clients.slice(b,b+a.pageSize),itemsCount:db.clients.length}}},fields:[{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name"},{name:"Married",type:"checkbox",title:"Is Married"}]}),$("#pager").on("change",function(){var a=parseInt($(this).val(),10);$("#loading").jsGrid("openPage",a)}),$("#customView").jsGrid({width:"100%",filtering:!0,editing:!0,sorting:!0,paging:!0,autoload:!0,pageSize:15,pageButtonCount:5,controller:db,fields:[{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name"},{name:"Married",type:"checkbox",title:"Is Married",sorting:!1},{type:"control",modeSwitchButton:!1,editButton:!1}]}),$(".config-panel input[type=checkbox]").on("click",function(){var a=$(this);$("#customView").jsGrid("option",a.attr("id"),a.is(":checked"))}),$("#batchDelete").jsGrid({width:"100%",autoload:!0,confirmDeleting:!1,paging:!0,controller:{loadData:function(){return db.clients}},fields:[{headerTemplate:function(){return $("<button>").attr("type","button").text("Delete").addClass("btn btn-primary mr-1").on("click",function(){d()})},itemTemplate:function(d,e){return $("<input>").attr("type","checkbox").prop("checked",$.inArray(e,a)>-1).on("change",function(){$(this).is(":checked")?b(e):c(e)})},align:"center",width:50},{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200}]});var a=[],b=function(b){a.push(b)},c=function(b){a=$.grep(a,function(a){return a!==b})},d=function(){if(a.length&&confirm("Are you sure?")){e(a);var b=$("#batchDelete");b.jsGrid("option","pageIndex",1),b.jsGrid("loadData"),a=[]}},e=function(a){db.clients=$.map(db.clients,function(b){return $.inArray(b,a)>-1?null:b})};$("#external").jsGrid({width:"100%",paging:!0,pageSize:15,pageButtonCount:5,pagerContainer:"#externalPager",pagerFormat:"current page: {pageIndex} &nbsp;&nbsp; {first} {prev} {pages} {next} {last} &nbsp;&nbsp; total pages: {pageCount}",pagePrevText:"<",pageNextText:">",pageFirstText:"<<",pageLastText:">>",pageNavigatorNextText:"&#8230;",pageNavigatorPrevText:"&#8230;",data:db.clients,fields:[{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name"},{name:"Married",type:"checkbox",title:"Is Married"}]}),$("#reordering").jsGrid({width:"100%",autoload:!0,rowClass:function(a,b){return"client-"+b},controller:{loadData:function(){return db.clients.slice(0,15)}},fields:[{name:"Name",type:"text",width:150},{name:"Age",type:"number",width:50},{name:"Address",type:"text",width:200},{name:"Country",type:"select",items:db.countries,valueField:"Id",textField:"Name"},{name:"Married",type:"checkbox",title:"Is Married",sorting:!1}],onRefreshed:function(){var a=$("#reordering .jsgrid-grid-body tbody");a.sortable({update:function(b,c){var d=/\s+client-(\d+)\s+/,e=$.map(a.sortable("toArray",{attribute:"class"}),function(a){return d.exec(a)[1]});alert("Reordered indexes: "+e.join(", "));var f=$.map(a.find("tr"),function(a){return $(a).data("JSGridItem")});console&&console.log("Reordered items",f)}})}})});