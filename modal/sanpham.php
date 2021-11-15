<?php

function insert_sanpham($tensp, $giaold, $gianew, $hinh, $mota, $iddm, $hastag, $nhacungcap){
    $sql="insert into product(name,old_price,new_price, img, description, id_cate, id_hastags, id_agent) values('$tensp','$giaold', '$gianew', '$hinh','$mota','$iddm', '$hastag', '$nhacungcap')";
    pdo_execute($sql);
   
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,10"; 
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id desc limit 0,9"; 
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw="",$iddm=0){
    $sql="select * from sanpham where 1"; 
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($iddm){
    if($iddm>0){
        $sql="select * from danhmuc where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
}
function loadone_sanpham($id){
    $sql="select * from sanpham where id=".$id;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id,$iddm){
    $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
    if($hinh!="")
        $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
    else 
        $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."',mota='".$mota."' where id=".$id;   
        // var_dump($sql);
        // die;
        pdo_execute($sql);
    
    
}
function update_luotxem($idsp){
    $sql = "update sanpham set luotxem = luotxem + 1 where id=".$idsp;
    pdo_execute($sql);

}

?>