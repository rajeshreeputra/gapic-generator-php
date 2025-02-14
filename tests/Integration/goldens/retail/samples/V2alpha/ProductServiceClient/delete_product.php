<?php
/*
 * Copyright 2023 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START retail_v2alpha_generated_ProductService_DeleteProduct_sync]
use Google\ApiCore\ApiException;
use Google\Cloud\Retail\V2alpha\ProductServiceClient;

/**
 * Deletes a [Product][google.cloud.retail.v2alpha.Product].
 *
 * @param string $formattedName Full resource name of
 *                              [Product][google.cloud.retail.v2alpha.Product], such as
 *                              `projects/&#42;/locations/global/catalogs/default_catalog/branches/default_branch/products/some_product_id`.
 *
 *                              If the caller does not have permission to delete the
 *                              [Product][google.cloud.retail.v2alpha.Product], regardless of whether or
 *                              not it exists, a PERMISSION_DENIED error is returned.
 *
 *                              If the [Product][google.cloud.retail.v2alpha.Product] to delete does not
 *                              exist, a NOT_FOUND error is returned.
 *
 *                              The [Product][google.cloud.retail.v2alpha.Product] to delete can neither be
 *                              a
 *                              [Product.Type.COLLECTION][google.cloud.retail.v2alpha.Product.Type.COLLECTION]
 *                              [Product][google.cloud.retail.v2alpha.Product] member nor a
 *                              [Product.Type.PRIMARY][google.cloud.retail.v2alpha.Product.Type.PRIMARY]
 *                              [Product][google.cloud.retail.v2alpha.Product] with more than one
 *                              [variants][google.cloud.retail.v2alpha.Product.Type.VARIANT]. Otherwise, an
 *                              INVALID_ARGUMENT error is returned.
 *
 *                              All inventory information for the named
 *                              [Product][google.cloud.retail.v2alpha.Product] will be deleted. Please see
 *                              {@see ProductServiceClient::productName()} for help formatting this field.
 */
function delete_product_sample(string $formattedName): void
{
    // Create a client.
    $productServiceClient = new ProductServiceClient();

    // Call the API and handle any network failures.
    try {
        $productServiceClient->deleteProduct($formattedName);
        printf('Call completed successfully.' . PHP_EOL);
    } catch (ApiException $ex) {
        printf('Call failed with message: %s' . PHP_EOL, $ex->getMessage());
    }
}

/**
 * Helper to execute the sample.
 *
 * This sample has been automatically generated and should be regarded as a code
 * template only. It will require modifications to work:
 *  - It may require correct/in-range values for request initialization.
 *  - It may require specifying regional endpoints when creating the service client,
 *    please see the apiEndpoint client configuration option for more details.
 */
function callSample(): void
{
    $formattedName = ProductServiceClient::productName(
        '[PROJECT]',
        '[LOCATION]',
        '[CATALOG]',
        '[BRANCH]',
        '[PRODUCT]'
    );

    delete_product_sample($formattedName);
}
// [END retail_v2alpha_generated_ProductService_DeleteProduct_sync]
