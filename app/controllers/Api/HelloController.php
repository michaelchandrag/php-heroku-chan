<?php

namespace Controllers\Api;

use Controllers\BaseController;
use Models\Product;
use Illuminate\Database\Capsule\Manager as DB;

class HelloController extends BaseController {

	public function __construct () {

	}

	public function HelloAction ($request, $response, $args) {
		$data['data'] = 'hello';
		$data['success'] = true;
		return $this->throwJSON($response, $data);
	}

	public function GetProductsAction ($request, $response, $args) {
		$query = DB::table('products');
		$products = $query->get();

		$data['data'] = $products;
		$data['success'] = true;
		return $this->throwJSON($response, $data);
	}

	public function PanggilAction ($request, $response, $args) {
		$nama = $args['nama'];
		$data['nama'] = $nama;
		$data['success'] = true;
		$data['message'] = 'Halo '.$nama;
		return $this->throwJSON($response, $data);
	}

	public function CreateProductAction ($request, $response, $args) {
		$body = $request->getParsedBody();
		if (!isset($body['nama']) && empty($body['nama'])) {
			$data['success'] = false;
			$data['message'] = 'Nama should not empty.';
		}

		$product = new Product();
		$product->nama = $body['nama'];
		$product->save();

		$data['product'] = $product;
		$data['success'] = true;
		$data['message'] = 'Create product success.';

		return $this->throwJSON($response, $data);
	}
}