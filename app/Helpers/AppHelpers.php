<?php

namespace App\Helpers;

class AppHelpers
{
	public static function dateTimeNow()
	{
		return date('Y-m-d H:i:s');
	}

	public static function imageName($extension, $uniqueKey = 0)
	{
		$unique = md5(self::dateTimeNow().$uniqueKey);
		return $unique.'.'.$extension;
	}

	public static function image($filename, $maxWidth = 0)
	{
		$src = url('uploads/images/'.$filename);
		if ($maxWidth > 0) {
			return '<img width="'.$maxWidth.'" src="'.$src.'">';
		}
		return '<img src="'.$src.'">';
	}

	public static function btnDownload($filename)
	{
		$link = url('uploads/pdf/'.$filename);
		return '<a href="'.$link.'" target="_blank" class="btn btn-secondary btn-sm"><i class="fa fa-file mr-2"></i>PDF</a>';
	}

	public static function btnDetail($route, $param, $id, $name)
	{
		$link = route($route).'?'.$param.'='.$id;
		return '<a href="'.$link.'" class="btn btn-secondary btn-sm"><i class="fa fa-eye mr-2"></i>'.$name.'</a>';
	}

	public static function buttonActions($route, $id, $isEdit = true, $isDelete = true)
	{
		$btn = '';
		if ($isEdit) {
			$edit = route($route.'.show', $id);
			$btn .= '<a href="'.$edit.'" class="btn btn-sm btn-primary m-1"><i class="fa fa-fw fa-edit"></i></a>';
		}
		if ($isDelete) {
			$delete = route($route.'.destroy', $id);
			$btn .= '<form action="'.$delete.'" method="post" id="form-delete-'.$id.'">';
			$btn .= csrf_field();
			$btn .= method_field('delete');
			$btn .= '<button type="button" onclick="deleteData(\'#form-delete-'.$id.'\')" class="btn btn-sm btn-danger m-1"><i class="fa fa-fw fa-trash"></i></button>';
			$btn .= '</form>';
		}
		return $btn;
	}
}