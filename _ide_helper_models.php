<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Product\Category{
/**
 * App\Models\Product\Category\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\Category\ProductSubSubCategory[] $prodSubSubCatThroughProdSubCat
 * @property-read int|null $prod_sub_sub_cat_through_prod_sub_cat_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\Category\ProductSubCategory[] $productSubCategory
 * @property-read int|null $product_sub_category_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\Category\ProductSubSubCategory[] $productSubSubCategory
 * @property-read int|null $product_sub_sub_category_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models\Product\Category{
/**
 * App\Models\Product\Category\ProductSubCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $product_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product\Category\ProductCategory $productCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\Category\ProductSubSubCategory[] $productSubSubCategory
 * @property-read int|null $product_sub_sub_category_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereUpdatedAt($value)
 */
	class ProductSubCategory extends \Eloquent {}
}

namespace App\Models\Product\Category{
/**
 * App\Models\Product\Category\ProductSubSubCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property int $product_sub_category_id
 * @property string|null $descrition
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $product_category_id
 * @property-read \App\Models\Product\Category\ProductCategory $productCategory
 * @property-read \App\Models\Product\Category\ProductSubCategory $productSubCategory
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereDescrition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubSubCategory whereUpdatedAt($value)
 */
	class ProductSubSubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SellerDetail
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $skill_type
 * @property string|null $ownership_type
 * @property int|null $working_experience
 * @property string|null $phone_number
 * @property string|null $nid_number
 * @property string|null $picture_with_nid
 * @property string|null $adsress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_verified
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereAdsress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereNidNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereOwnershipType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail wherePictureWithNid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereSkillType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerDetail whereWorkingExperience($value)
 */
	class SellerDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role_id
 * @property string|null $profile_photo
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role $role
 * @property-read \App\Models\SellerDetail|null $sellerDetail
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

