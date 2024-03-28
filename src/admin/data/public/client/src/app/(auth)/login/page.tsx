"use client";

import React, { useState } from "react";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Button } from "@/components/ui/button";
import { useFormik } from "formik";
import { useRouter } from "next/navigation";
import * as Yup from "yup";
import { MoonLoader } from "react-spinners";
import { Checkbox } from "@/components/ui/checkbox";
import { useToast } from "@/components/ui/use-toast";
import { Eye, EyeOff } from "lucide-react";
import Image from "next/image";
import Link from "next/link";

const LoginSchema = Yup.object().shape({
  email: Yup.string().email("Invalid email").required("Email is Required"),
  password: Yup.string()
    // .min(8, "Password must be at least 8 characters long")
    // .matches(/[0-9]/, "Password must contain at least one number")
    // .matches(/[A-Z]/, "Password must contain at least one uppercase letter")
    // .matches(
    //   /[!@#\$%^&*()_+{}":;<>,.?~\[\]]/,
    //   "Password must contain at least one special character"
    // )
    .required("Password is required"),
});

export default function Login() {
  const [isVisible, setIsVisible] = useState(false);

  const { toast } = useToast();
  const router = useRouter();

  const sleep = (ms: number) => new Promise((r) => setTimeout(r, ms));

  const {
    handleSubmit,
    handleChange,
    handleBlur,
    values,
    touched,
    errors,
    isValid,
    isSubmitting,
  } = useFormik({
    initialValues: {
      email: "",
      password: "",
      remeberMe: "no",
    },
    validationSchema: LoginSchema,
    validateOnChange: true,
    validateOnBlur: true,
    validateOnMount: true,
    onSubmit: async (values) => {
      await sleep(500);

      if (values) {
        toast({ description: "Successfully logged in." });
        console.log(values);
        router.replace("/");
      } else {
        toast({
          variant: "destructive",
          title: "Uh oh! Something went wrong.",
          description: "There was a problem with your request.",
        });
      }
    },
  });

  return (
    <main className="flex bg-[#F4F2F4]">
      <div className="bg-[url('/side-left.png')] h-screen w-[473px] relative hidden md:block">
        <Image
          src="/Mask group.png"
          height={200}
          width={200}
          alt="svg"
          className="absolute top-20 opacity-50"
        />
        <div className="absolute bottom-20 flex flex-col items-center text-center text-customWhite text-md px-12">
          <h1 className="text-[33px]">Accountability for ministry Growth</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididun.
          </p>
        </div>
      </div>

      <div className="flex flex-col justify-center h-screen items-center w-[380px] mx-auto">
        <Image
          src="/logo.png"
          height={77}
          width={219}
          alt="logo"
          className="mb-16"
        />
        
        <form onSubmit={handleSubmit} className="w-full">
          <div>
            <Label htmlFor="email" className="text-[#757575] text-[13px]">
              Email
            </Label>
            <Input
              type="email"
              name="email"
              autoComplete="email"
              required
              value={values.email}
              onChange={handleChange}
              onBlur={handleBlur}
              className={
                errors.email && touched.email
                  ? "border-0 ring ring-customRed ring-offset-2 bg-background"
                  : "border-0 border-b border-b-[#BDBDBD] rounded-none pl-0 mb-6 bg-background"
              }
            />
            {errors.email && touched.email ? (
              <div className="text-xs text-customRed mt-1">{errors.email}</div>
            ) : null}
          </div>

          <Label htmlFor="password" className="text-[#757575] text-[13px]">
            Password
          </Label>
          <div className="relative">
            <Input
              type={isVisible === true ? "text" : "password"}
              name="password"
              required
              value={values.password}
              onChange={handleChange}
              onBlur={handleBlur}
              className={`bg-[#F4F2F4]
                    ${
                      errors.password && touched.password
                        ? "border-0 ring ring-customRed ring-offset-2 bg-background"
                        : "border-0 border-b border-b-[#BDBDBD] rounded-none pl-0 bg-background"
                    }`}
            />
            {errors.password && touched.password ? (
              <div className="text-xs text-customRed mt-1">
                {errors.password}
              </div>
            ) : null}
            <span
              onClick={() => setIsVisible(!isVisible)}
              className="size-5 cursor-pointer absolute top-[10px] right-2 z-10"
            >
              {" "}
              {isVisible ? (
                <Eye size={16} color="#757575" />
              ) : (
                <EyeOff size={16} color="#757575" />
              )}
            </span>
          </div>

          <div className="flex justify-between items-center mt-6 mb-12">
            <div className="flex items-center space-x-1 cursor-pointer">
              <Checkbox
                value={(values.remeberMe = "yes")}
                name="rememberMe"
                onChange={handleChange}
                className="size-6 text-[#757575]"
              />
              <label
                htmlFor="remeber-me"
                className="text-[#757575] text-[13px]"
              >
                Remember me
              </label>
            </div>

            <Button
              disabled={!isValid || isSubmitting}
              type="submit"
              className="bg-cta w-[153px] rounded-[56px] text-customWhite p-7 hover:bg-cta/75"
            >
              LOG IN
              <MoonLoader
                size={20}
                color="white"
                className="ml-2 text-white"
                loading={isSubmitting}
              />
            </Button>
          </div>

          <div className="flex flex-col justify-center space-y-1.5 items-center text-[13px]">
            <span>
              No account yet?{" "}
              <Link href="" className="underline font-bold underline-offset-4">
                SIGN UP
              </Link>
            </span>
            <span>
              Forgot password?{" "}
              <Link href="" className="underline font-bold underline-offset-4">
                Reset password
              </Link>
            </span>
          </div>
        </form>
      </div>
    </main>
  );
}
