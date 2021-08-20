function printErr(elementID,hintMess)
{
    document.getElementById(elementID).innerHTML=hintMess;
}
function validateCreateProductForm()
{
    var name = document.getElementById('name').value;
    var quantity = document.getElementById('quantity').value;
    var price = document.getElementById('price').value;
    var brand = document.getElementById('brand').value;
    var model = document.getElementById('model').value;
    var image = document.getElementById('image').value;
    var cpu = document.getElementById('cpu').value;
    var amountofram = document.getElementById('amountofram').value;
    var typeofram = document.getElementById('typeofram').value;
    var screensize = document.getElementById('screensize').value;
    var gcard = document.getElementById('gcard').value;
    var hdcapacity = document.getElementById('hdcapacity').value;
    var hdtype = document.getElementById('hdtype').value;
    var width = document.getElementById('width').value;
    var depth = document.getElementById('depth').value;
    var height = document.getElementById('height').value;
    var weight = document.getElementById('weight').value;
    var os = document.getElementById('os').value;
    var releaseyear = document.getElementById('releaseyear').value;
    var checkimage = document.getElementById('check-image').value;
    var Name = document.getElementById('name');
    var Quantity = document.getElementById('quantity');
    var Price = document.getElementById('price');
    var Brand = document.getElementById('brand');
    var Model = document.getElementById('model');
    var Image = document.getElementById('image');
    var Cpu = document.getElementById('cpu');
    var Amountofram = document.getElementById('amountofram');
    var Typeofram = document.getElementById('typeofram');
    var Screensize = document.getElementById('screensize');
    var Gcard = document.getElementById('gcard');
    var Hdcapacity = document.getElementById('hdcapacity');
    var Hdtype = document.getElementById('hdtype');
    var Width = document.getElementById('width');
    var Depth = document.getElementById('depth');
    var Height = document.getElementById('height');
    var Weight = document.getElementById('weight');
    var Os = document.getElementById('os');
    var Releaseyear = document.getElementById('releaseyear');
    var NameErr = QuantityErr = PriceErr = BrandErr = ModelErr=ImageErr = CpuErr = AmountoframErr = TypeoframErr
                = ScreensizeErr=GcardErr = HdcapacityErr=HdtypeErr=WidthErr=DepthErr=HeightErr=WeightErr=OsErr=ReleaseyearErr 
                = true;
// Validate Name
    if (name==""){
        printErr("nameErr","Name must not be blank.");
        Name.classList.add("input-err");
    }else{
        printErr("nameErr","");
        Name.classList.remove("input-err");
        NameErr = false;
    }
//Validate Quantity
    if (quantity==""){
        printErr("quantityErr","Quantity must not be blank.");
        Quantity.classList.add("input-err");
    }else{
        if(isNaN(quantity)){
            printErr("quantityErr","Quantity must be a number");
            Quantity.classList.add("input-err");
        }else{
            if(quantity<=0){
                printErr("quantityErr","Quantity must be greater than 0.");
                Quantity.classList.add("input-err");
            }else{
                if(quantity%1!==0){
                    printErr("quantityErr","Quantity must be an integer");
                    Quantity.classList.add("input-err");
                }else{
                    printErr("quantityErr","");
                    Quantity.classList.remove("input-err");
                    QuantityErr = false;
                }
            }
        }
    }

//Validate Price
    if (price==""){
        printErr("priceErr","Price must not be blank.");
        Price.classList.add("input-err");
    }else{
        if(isNaN(price)){
            printErr("priceErr","Price must be a number");
            Price.classList.add("input-err");
        }else{
            if(price<=0){
                printErr("priceErr","Price must be greater than 0.");
                Price.classList.add("input-err");
            }else{
                    printErr("priceErr","");
                    Price.classList.remove("input-err");
                    PriceErr = false;
            }
        }
    }

// Validate brand
    if (brand==""){
        printErr("brandErr","Brand must not be blank.");
        Brand.classList.add("input-err");
    }else{
        printErr("brandErr","");
        Brand.classList.remove("input-err");
        BrandErr = false;
    }
// Validate model
    if (model==""){
        printErr("modelErr","Model must not be blank.");
        Model.classList.add("input-err");
    }else{
        printErr("modelErr","");
        Model.classList.remove("input-err");
        ModelErr = false;
    }
// Validate image
if (checkimage==0){
    if (image==""){
        printErr("imageErr","Image must not be blank.");
        Image.classList.add("input-err");
    }else{
        printErr("imageErr","");
        Image.classList.remove("input-err");
        ImageErr = false;
    }
}else{
    ImageErr = false;
}
    
// Validate cpu
    if (cpu==""){
        printErr("cpuErr","CPU must not be blank.");
        Cpu.classList.add("input-err");
    }else{
        printErr("cpuErr","");
        Cpu.classList.remove("input-err");
        CpuErr = false;
    }
//Validate Amountofram
if (amountofram==""){
    printErr("amountoframErr","Amount of ram must not be blank.");
    Amountofram.classList.add("input-err");
}else{
    if(isNaN(amountofram)){
        printErr("amountoframErr","Amount of ram must be a number");
        Amountofram.classList.add("input-err");
    }else{
        if(amountofram<=0){
            printErr("amountoframErr","Amount of ram must be greater than 0.");
            Amountofram.classList.add("input-err");
        }else{
            if(amountofram%1!==0){
                printErr("amountoframErr","Amount of ram must be an integer");
                Amountofram.classList.add("input-err");
            }else{
                printErr("amountoframErr","");
                Amountofram.classList.remove("input-err");
                AmountoframErr = false;
            }
        }
    }
}

// Validate typeofram
    if (typeofram==""){
        printErr("typeoframErr","Type of ram must not be blank.");
        Typeofram.classList.add("input-err");
    }else{
        printErr("typeoframErr","");
        Typeofram.classList.remove("input-err");
        TypeoframErr = false;
    }

//Validate Screensize
    if (screensize==""){
        printErr("screensizeErr","Screen Size must not be blank.");
        Screensize.classList.add("input-err");
    }else{
        if(isNaN(screensize)){
            printErr("screensizeErr","Screen Size must be a number");
            Screensize.classList.add("input-err");
        }else{
            if(screensize<=0){
                printErr("screensizeErr","Screen Size must be greater than 0.");
                Screensize.classList.add("input-err");
            }else{
                    printErr("screensizeErr","");
                    Screensize.classList.remove("input-err");
                    ScreensizeErr = false;
            }
        }
    }
// Validate gcard
    if (gcard==""){
        printErr("gcardErr","Type of ram must not be blank.");
        Gcard.classList.add("input-err");
    }else{
        printErr("gcardErr","");
        Gcard.classList.remove("input-err");
        GcardErr = false;
    }
//Validate Hdcapacity
    if (hdcapacity==""){
        printErr("hdcapacityErr","Hard Drive Capacity must not be blank.");
        Hdcapacity.classList.add("input-err");
    }else{
        if(isNaN(hdcapacity)){
            printErr("hdcapacityErr","Hard Drive Capacity must be a number");
            Hdcapacity.classList.add("input-err");
        }else{
            if(hdcapacity<=0){
                printErr("hdcapacityErr","Hard Drive Capacity must be greater than 0.");
                Hdcapacity.classList.add("input-err");
            }else{
                if(hdcapacity%1!==0){
                    printErr("hdcapacityErr","Hard Drive Capacity must be an integer");
                    Hdcapacity.classList.add("input-err");
                }else{
                    printErr("hdcapacityErr","");
                    Hdcapacity.classList.remove("input-err");
                    HdcapacityErr = false;
                }
            }
        }
    }
// Validate hdtype
    if (hdtype==""){
        printErr("hdtypeErr","Type of ram must not be blank.");
        Hdtype.classList.add("input-err");
    }else{
        printErr("hdtypeErr","");
        Hdtype.classList.remove("input-err");
        HdtypeErr = false;
    }
//Validate Width
    if (width==""){
        printErr("widthErr","Width must not be blank.");
        Width.classList.add("input-err");
    }else{
        if(isNaN(width)){
            printErr("widthErr","Width must be a number");
            Width.classList.add("input-err");
        }else{
            if(width<=0){
                printErr("widthErr","Width must be greater than 0.");
                Width.classList.add("input-err");
            }else{
                    printErr("widthErr","");
                    Width.classList.remove("input-err");
                    WidthErr = false;
            }
        }
    }
//Validate Depth
    if (depth==""){
        printErr("depthErr","Depth must not be blank.");
        Depth.classList.add("input-err");
    }else{
        if(isNaN(depth)){
            printErr("depthErr","Depth must be a number");
            Depth.classList.add("input-err");
        }else{
            if(depth<=0){
                printErr("depthErr","Depth must be greater than 0.");
                Depth.classList.add("input-err");
            }else{
                    printErr("depthErr","");
                    Depth.classList.remove("input-err");
                    DepthErr = false;
            }
        }
    }
//Validate Height
    if (height==""){
        printErr("heightErr","Height must not be blank.");
        Height.classList.add("input-err");
    }else{
        if(isNaN(height)){
            printErr("heightErr","Height must be a number");
            Height.classList.add("input-err");
        }else{
            if(height<=0){
                printErr("heightErr","Height must be greater than 0.");
                Height.classList.add("input-err");
            }else{
                    printErr("heightErr","");
                    Height.classList.remove("input-err");
                    HeightErr = false;
            }
        }
    }
    //Validate Weight
    if (weight==""){
        printErr("weightErr","Weight must not be blank.");
        Weight.classList.add("input-err");
    }else{
        if(isNaN(weight)){
            printErr("weightErr","Weight must be a number");
            Weight.classList.add("input-err");
        }else{
            if(weight<=0){
                printErr("weightErr","Weight must be greater than 0.");
                Weight.classList.add("input-err");
            }else{
                    printErr("weightErr","");
                    Weight.classList.remove("input-err");
                    WeightErr = false;
            }
        }
    }
    // Validate os
    if (os==""){
        printErr("osErr","OS must not be blank.");
        Os.classList.add("input-err");
    }else{
        printErr("osErr","");
        Os.classList.remove("input-err");
        OsErr = false;
    }
//Validate Releaseyear
    if (releaseyear==""){
        printErr("releaseyearErr","Release year must not be blank.");
        Releaseyear.classList.add("input-err");
    }else{
        if(isNaN(releaseyear)){
            printErr("releaseyearErr","Release year must be a number");
            Releaseyear.classList.add("input-err");
        }else{
            if(releaseyear<=0){
                printErr("releaseyearErr","Release year must be greater than 0.");
                Releaseyear.classList.add("input-err");
            }else{
                if(releaseyear%1!==0){
                    printErr("releaseyearErr","Releaseyear must be an integer");
                    Releaseyear.classList.add("input-err");
                }else{
                    printErr("releaseyearErr","");
                    Releaseyear.classList.remove("input-err");
                    ReleaseyearErr = false;
                }
            }
        }
    }

    if (NameErr==true||QuantityErr==true||PriceErr==true||BrandErr==true||ModelErr==true||
        ImageErr==true||CpuErr==true||AmountoframErr==true||TypeoframErr==true||ScreensizeErr==true||
        GcardErr==true||HdcapacityErr==true||HdtypeErr==true||WidthErr==true||DepthErr==true||
        HeightErr==true||WeightErr==true||OsErr==true||ReleaseyearErr==true)
    {
        return false;
    }
    else
    {
        return;
    }
}
function validateInsertBrandForm()
{
    var brand = document.getElementById('name').value;
    var image = document.getElementById('image').value;
    var Brand = document.getElementById('name');
    var Image = document.getElementById('image');
    var checkimage = document.getElementById('check-image').value;
    var BrandErr = ImageErr = true;
// Validate Name
    if (brand==""){
        printErr("brandErr","Brand Name must not be blank.");
        Brand.classList.add("input-err");
    }else{
        printErr("brandErr","");
        Brand.classList.remove("input-err");
        BrandErr = false;
    }

// Validate image
if (checkimage==0){
    if (image==""){
        printErr("imageErr","Please choose a image.");
        Image.classList.add("input-err");
    }else{
        printErr("imageErr","");
        Image.classList.remove("input-err");
        ImageErr = false;
    }
}else{
    ImageErr = false;
}
    if (BrandErr==true||ImageErr==true)
    {
        return false;
    }
    else
    {
        return;
    }
}