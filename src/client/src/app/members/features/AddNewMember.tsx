'use client'

import { Button } from "@/components/ui/button"
import { useFormik } from "formik";
import { useRouter } from "next/navigation";
import * as Yup from "yup";
import { MoonLoader } from "react-spinners";
import { Checkbox } from "@/components/ui/checkbox";
import { useToast } from "@/components/ui/use-toast";
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/components/ui/dialog"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"

const NewMemberSchema = Yup.object().shape({
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

export function AddNewMember() {
  const { toast } = useToast();
  const router = useRouter();

  return (
    <Dialog>
      <DialogTrigger asChild>
        <Button variant="outline" className="text-primary border-primary">Edit Profile</Button>
      </DialogTrigger>
      <DialogContent className="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>Add New Member</DialogTitle>
          {/* <DialogDescription>
            Add New member.
          </DialogDescription> */}
        </DialogHeader>
        <div className="grid gap-4 py-4">
          <div className="flex flex-col gap-2">
            <Label htmlFor="name" className="">
              Name
            </Label>
            <Input
              id="name"
              placeholder="Full Name"
              className=""
            />
          </div>
          <div className="flex flex-col gap-2">
            <Label htmlFor="phone" className="">
              Phone number
            </Label>
            <Input
              id="phone"
              type="tel"
              className=""
            />
          </div>

          <div className="flex flex-col gap-2">
            <Label htmlFor="phone" className="">
              Email Address
            </Label>
            <Input
              id="phone"
              type="tel"
              className=""
            />
          </div>

          <div className="flex flex-col gap-2">
            <Label htmlFor="phone" className="">
              House Address
            </Label>
            <Input
              id="phone"
              type="tel"
              className=""
            />
          </div>
        </div>
        <DialogFooter>
          <Button type="submit">Save changes</Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  )
}
